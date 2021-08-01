<x-layouts.admin_layout>


        <livewire:dashboard-update-mode />
        <livewire:oh-dear-uptime-tile position="a1:a3" />

</x-layouts.admin_layout>
@push('scripts')
    <script>
        const theme = (theme, initialMode) => ({
            theme,
            mode: initialMode,

            init() {
                if (this.theme === 'device') {
                    this.detectDeviceColorScheme();

                    return;
                }

                if (this.theme === 'auto') {
                    this.listenForUpdateModeEvent();

                    return;
                }
            },

            detectDeviceColorScheme() {
                const mediaQuery = matchMedia("(prefers-color-scheme: dark)");

                this.mode = mediaQuery.matches ? 'dark' : 'light';

                mediaQuery.addListener((event) => {
                    this.mode = mediaQuery.matches ? 'dark' : 'light';
                });
            },

            listenForUpdateModeEvent() {
                window.livewire.on('updateMode', newMode => {
                    if (newMode !== this.mode) {
                        this.mode = newMode;
                    }
                })
            },
        });
    </script>

@endpush
