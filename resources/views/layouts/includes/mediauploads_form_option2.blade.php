<div class="container">
    <p style="color:grey"><small>Max size: 10 MB - Supported types: JPEG | JPG | BMP | GIF | SVG | PNG | PDF</small></p>
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="https://jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript><input type="hidden" name="redirect" value="{{ url('frontend.index') }}"></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="fas fa-plus"></i>
                    <span>Add files...</span>
                    <input id="uploadfiles" type="file" name="files[]" multiple >
                </span>
                {{--<button type="submit" class="btn btn-primary start">--}}
                    {{--<i class="fas fa-upload"></i>--}}
                    {{--<span>Start upload</span>--}}
                {{--</button>--}}
                {{--<button type="reset" class="btn btn-warning cancel">--}}
                    {{--<i class="fas fa-ban"></i>--}}
                    {{--<span>Cancel upload</span>--}}
                {{--</button>--}}
                {{--<button class="btn btn-danger delete">--}}
                    {{--<i class="fas fa-trash"></i>--}}
                    {{--<span>Delete</span>--}}
                {{--</button>--}}
                <!-- The global file processing state -->
                {{--<span class="fileupload-process"></span>--}}
            </div>
            <!-- The global progress state -->
            {{--<div class="col-5 fileupload-progress">--}}
                {{--<!-- The global progress bar -->--}}
                {{--<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">--}}
                    {{--<div class="progress-bar progress-bar-success" style="width:0%;"></div>--}}
                {{--</div>--}}
                {{--<!-- The extended global progress state -->--}}
                {{--<div class="progress-extended">&nbsp;</div>--}}
            {{--</div>--}}
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
</div>
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>

