// Upload fotos drag and drop JS

var dropzone = new Dropzone('#file-upload', {
    previewTemplate: document.querySelector('#preview-template').innerHTML,
    parallelUploads: 3,
    thumbnailHeight: 150,
    thumbnailWidth: 150,
    maxFilesize: 5,
    filesizeBase: 1500,
    thumbnail: function (file, dataUrl) {
        if (file.previewElement) {
            file.previewElement.classList.remove("dz-file-preview");
            var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
            for (var i = 0; i < images.length; i++) {
                var thumbnailElement = images[i];
                thumbnailElement.alt = file.name;
                thumbnailElement.src = dataUrl;
            }
            setTimeout(function () {
                file.previewElement.classList.add("dz-image-preview");
            }, 1);
        }
    }
});

var minSteps = 6,
    maxSteps = 60,
    timeBetweenSteps = 100,
    bytesPerStep = 100000;
dropzone.uploadFiles = function (files) {
    var self = this;
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
        for (var step = 0; step < totalSteps; step++) {
            var duration = timeBetweenSteps * (step + 1);
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


// Sponsors Part

$(document).ready(function(){
    /* The following code is executed once the DOM is loaded */

    $('.sponsorFlip').bind("click",function(){

        // $(this) point to the clicked .sponsorFlip element (caching it in elem for speed):

        var elem = $(this);

        // data('flipped') is a flag we set when we flip the element:

        if(elem.data('flipped'))
        {
            // If the element has already been flipped, use the revertFlip method
            // defined by the plug-in to revert to the default state automatically:

            elem.revertFlip();

            // Unsetting the flag:
            elem.data('flipped',false)
        }
        else
        {
            // Using the flip method defined by the plugin:

            elem.flip({
                direction:'lr',
                speed: 350,
                onBefore: function(){
                    // Insert the contents of the .sponsorData div (hidden
                    // from view with display:none) into the clicked
                    // .sponsorFlip div before the flipping animation starts:

                    elem.html(elem.siblings('.sponsorData').html());
                }
            });

            // Setting the flag:
            elem.data('flipped',true);
        }
    });

});
