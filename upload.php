<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Filebin-made sharing file easier and safe</title>

        <script> 
            var url = 'save.php';
            var count = 0;
            var imageUrl;
            var fileName;
            window.onload=function(){
                document.getElementById('uploadButton').addEventListener('change',()=>{
                    var fileInput = $('#uploadButton');
                    var file_name = fileInput.val();
                    var file = fileInput[0].files[0];
                    var data = new FormData();
                    data.append('file', file, file_name);
                    fileName = file.name;

                    $.ajax({
                        method:'POST',
                        url: url,
                        processData:false,
                        contentType:false,
                        data: data,
                        success: function(response){
                            $('#downloadFile').show();
                            var url = response;
                            imageUrl = url + file.name;

                            $('.hrefClass').attr("href", imageUrl);
                            $('#downloadFile').attr("href", imageUrl);
                            $('#fileName2').text(fileName);

                        }
                    });     
                });
            };    

        function countDownload(){
            data = {'count': count, 'image': imageUrl};
            if(count == 0){
                $('#fileName2').attr("download", fileName);
            }
            else{
                $('#fileName2').removeAttr("download");
                $('#fileName2').attr("href","#");
                $('#fileName2').text("File can be downloaded only once");  
                $.ajax({
                    method: 'POST',
                    url:url,
                    data:data,
                    success: function(response){
                        return false;                                                                   
                    }

                });
            }
            count++;

        }

        </script>
        

    </head>

    <body id="fileDrop">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="display-2" style="text-align: center;">
                        Welcome To Filebin
                    </h1>
                </div>
            </div>

            
            <div class="row table-active">
                <div class="col-sm-12">
                    <br/>
                    <p class="lead" style="text-align: center;">
                        Upload Files upto 20mb and share with your intended user.
                        The unique link will be generated, for each file, that will
                        expire once downloaded by the intended user.
                    </p>
                    <p class="lead" style="text-align: center;">
                        <strong>1.</strong>
                        Click <em>Upload files</em> below, or drag and drop the files
                        into this browser window.
                    </p>
                    <p class="lead" style="text-align: center;">
                        <strong>2.</strong>
                        Wait until the file uploads complete.
                    </p>
                    <p class="lead" style="text-align: center;">
                        <strong>3.</strong>
                        Share to one intended receiver.
                    </p>
                    <div style="text-align: center;">
                        <span><i class="fa fa-cloud-upload" ></i> Upload files</span>
                        <input type="file" class="upload" name="uploadButton" id="uploadButton" >
                    </div>
                    <br/>
                </div>
            </div>
            <br/>
            <span id="fileList"></span>

            
            <div id="fileCount"></div>
        </div>

        <div class="container-fluid">    
            <div class="row">
                <div class="col-sm-6" id="downloadFile" style="display: none;">
                    <h3  style="text-align: right;">
                        Download File:
                    </h3>
                </div>

                <div class="col-sm-6" style="text-align: left;">
                    <i class="fa fa-fw fa-file-image-o" ></i>
                    <a class="hrefClass" id="fileName2" onclick="countDownload()"></a>
                                
                </div>

            </div>
                
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </body>
</html>
