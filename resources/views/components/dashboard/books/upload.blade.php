@props(['book', 'volume', 'chapter'])


<div>

    <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false"
         x-cloak>
        <div class="flex">
            <x-buttons.create @click="showModal = true"
                              class="py-1 px-3 mx-2 w-full text-white rounded-md dark:bg-white bg-dark dark:text-black">
                Upload Chapter
            </x-buttons.create>
        </div>


        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)"
             x-show="showModal" :class="{ ' absolute  inset-0 z-10 flex items-center justify-center': showModal }">
            <!--Dialog-->
            <div class="py-4 px-6 w-full mx-auto text-left bg-white rounded shadow-lg dark:bg-darker md:max-w-4xl"
                 x-show="showModal" x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Upload Pages </p>
                <div class="z-50 cursor-pointer" @click="showModal = false">
                    <svg class="text-black fill-current dark:text-white" xmlns="http://www.w3.org/2000/svg"
                         width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>
            <!-- content -->

            <div class="w-full h-75">
                <div class=" w-full dark:text-black bg-blue-400 h-75">
                    <form action="{{ route('admin.page.upload', ['book' => $book, 'volume' => $volume, 'chapter' => $chapter]) }}" class="dropzone "
                          enctype="multipart/form-data"
                          id="file-upload" id="dropzone" method="post">
                        @csrf


                    </form>
                </div>
                <div class="shadow w-full bg-grey-light m-3 ">
                    <div id="progress-bar" class="bg-blue-500 text-xs leading-none py-1 text-center text-white" style="width: 0%" data-dz-uploadprogress></div>
                </div>
                <div class="flex justify-center my-2">


                    <x-buttons.create @click="showModal = false"
                                      class="w-2/5 mx-2 text-white dark:bg-white bg-dark dark:text-black">Done
                    </x-buttons.create>
                    <x-buttons.create id="remove-content"
                                      class="w-2/5 mx-2 text-white dark:bg-white bg-dark dark:text-black">Add more
                    </x-buttons.create>

                </div>

            </div>
        </div>
        <!--/Dialog -->
    </div>  </div>
    <!-- /Overlay -->

</div>

    <script>
        window.onload = function() {
            let CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            import Dropzone from 'dropzone';
            let dropzone;
            dropzone = new Dropzone(`#file-upload`, {
                previewTemplate: document.querySelector('#preview-template').innerHTML,
                parallelUploads: 3,
                thumbnailHeight: 150,
                thumbnailWidth: 150,
                maxFilesize: 50,
                uploadprogress: true,
                addRemoveLinks:  true,
                filesizeBase: 1500,
                thumbnail: function (file, dataUrl) {
                    if (file.previewElement) {
                        file.previewElement.classList.remove("dz-file-preview");
                        var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                        for (let i = 0; i < images.length; i++) {
                            let thumbnailElement = images[i];
                            thumbnailElement.alt = file.name;
                            thumbnailElement.src = dataUrl;
                        }
                        setTimeout(function () {
                            file.previewElement.classList.add("dz-image-preview");
                        }, 1);
                    }
                }
            });
            dropzone.error( 'Something went wrong');



            const minSteps = 6,
                maxSteps = 60,
                timeBetweenSteps = 100,
                bytesPerStep = 100000;
            dropzone.uploadFiles = function (files) {
                let self = this;

                for (let i = 0; i < files.length; i++) {

                    let file = files[i];
                    totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                    for (let step = 0; step < totalSteps; step++) {
                        let duration = timeBetweenSteps * (step + 1);
                        setTimeout(function (file, totalSteps, step) {
                            return function () {
                                file.upload = {
                                    progress: 100 * (step + 1) / totalSteps,
                                    total: file.size,
                                    bytesSent: (step + 1) * file.size / totalSteps
                                };

                                self.emit('uploadprogress', file, file.upload.progress, file.upload
                                    .bytesSent);
                                if (file.upload.progress == 100) {
                                    file.status = Dropzone.SUCCESS;
                                    self.emit("success", file, 'success', null);
                                    self.emit("complete", file);
                                    self.processQueue();

                                }
                            };
                        }(file, totalSteps, step), duration);
                    }

                }

            }
            Dropzone.options.dropzone = {
                init: function() {

                //    document.getElementById('remove-content').addEventListener("click", function(){
                   //     dropzone.removeAllFiles();
//
                   // });
                    this.on("uploadprogress", function (file, progress) {

                        document.getElementById('progress-bar').style.width = progress;
                    });
                }
            };
        }
    </script>
