<!DOCTYPE html>

<html lang="en">

    <head>

        <title>bootstrap-imageupload</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
        
        
        <link href="custom/css/bootstrap-imageupload.css" rel="stylesheet">
		<script src="assests/jquery/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        
        <script src="custom/js/bootstrap-imageupload.js"></script>

        
        <style>
            body {
                padding-top: 70px;
            }

            .imageupload {
                margin: 20px 0;
            }
        </style>

    </head>

    <body>
            <!-- bootstrap-imageupload. -->
            <div class="imageupload panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">Upload Image</h3>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default active">File</button>
                        <button type="button" class="btn btn-default">URL</button>
                    </div>
                </div>
                <div class="file-tab panel-body">
                    <label class="btn btn-default btn-file">
                        <span>Browse</span>
                        <!-- The file is stored here. -->
                        <input type="file" name="image-file">
                    </label>
                    <button type="button" class="btn btn-default">Remove</button>
                </div>
                <div class="url-tab panel-body">
                    <div class="input-group">
                        <input type="text" class="form-control hasclear" placeholder="Image URL">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default">Remove</button>
                    <!-- The URL is stored here. -->
                    <input type="hidden" name="image-url">
                </div>
            </div>


			<script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();


        </script>

    </body>

</html>
