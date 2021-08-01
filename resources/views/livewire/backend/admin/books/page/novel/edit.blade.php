<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @push('header_scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
        <style>
            .ck.ck-content {
                min-width: 800px;
                min-height: 1000px;
                padding: 10px;
                max-width: 950px;
            }
        </style>
    @endpush

    <div class="container mx-auto ">


        <div class=" bg-gray-200 dark:bg-gray-800 dark:text-black m-3 p-3 rounded-lg w-full">

            <form wire:submit.prevent="edit_novel_page" method="post" enctype="multipart/form-data">

                <div class="min-vh-100">
                    <div x-data="editorApp()" x-init="init($dispatch)"
                         wire:ignore wire:key="ckEditor" x-ref="ckEditor"
                         wire:model.debounce.9999999ms="text">
                        {!! $this->text !!}
                    </div>

                </div>
                <x-buttons.create id="submit" class="bg-white text-black dark:bg-black dark:text-white px-4 my-2 py-3" wire:submit="submit" > Submit</x-buttons.create>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            /**
             * An alpinejs app that handles CKEditor's lifecycle
             */

            function editorApp() {
                return {
                    /**
                     * The function creates the editor and returns its instance
                     * @param $dispatch Alpine's magic property
                     */
                    create: async function($dispatch) {
                        // Create the editor with the x-ref
                        const editor = await ClassicEditor.create(this.$refs.ckEditor);
                        // Handle data updates
                        editor.model.document.on('change:data', function() {
                            $dispatch('input', editor.getData())
                        });
                        // return the editor
                        return editor;
                    },
                    /**
                     * Initilizes the editor and creates a listener to recreate it after a rerender
                     * @param $dispatch Alpine's magic property
                     */
                    init: async function($dispatch) {
                        // Get an editor instance
                        const editor = await this.create($dispatch);
                        // Set the initial data
                        editor.setData('{!! $this->text !!}')

                        // Pass Alpine context to Livewire's
                        const $this = this;
                        // On reinit, destroy the old instance and create a new one
                        Livewire.on('reinit', async function(e) {
                            editor.destroy();
                            await $this.create($dispatch);
                        });
                    }
                }
            }
        </script>
    @endpush

</div>
