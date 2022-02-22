// Start upload preview image
//$(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");
    var $uploadCrop,
        tempFilename,
        rawImg,
        imageId,
        hei, wid, src, dirphp;

        function setCroppieViewPort(id, h, w, s){
            id_img = id;
            hei = h;
            wid = w;
            src = s;
            if(s=='img_perfil'){
                dirphp = 'membro_updateFoto';
                //alert('update perfil');
            }
            else if(s=='img_vert'){
                dirphp = 'vertente_updateFoto';
                //alert('update vert:'+id_img);
            }
            else if(s=='img_logo'){
                dirphp = 'orquestra_updateFoto';
                //alert('update logo:'+s);
            }

            $('#upload-demo').croppie('destroy');

            $uploadCrop = $('#upload-demo').croppie({
            viewport: {
                height: hei,
                width: wid,
            },
            boundary: {
                height: hei+35,
                width: wid+65,
            },
            enforceBoundary: true,
            enableExif: true
        });
            //alert('teste');
        }

        function readFile(input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();
                reader.onload = function (e) {
                    $('.upload-demo').addClass('ready');
                    $('#upload-demo').css('height', (hei+50)+'px');
                    $('#cropImagePop').modal('show');
                    rawImg = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
            else {
                swal("Sorry - you're browser doesn't support the FileReader API");
            }
        }

        
        $('#cropImagePop').on('shown.bs.modal', function(){
            // alert('Shown pop');
            $uploadCrop.croppie('bind', {
                url: rawImg
            }).then(function(){
                console.log('jQuery bind complete');
            });
        });

        $('.uploadCroppieFoto').on('change', function () { imageId = $(this).data('id'); tempFilename = $(this).val();
                                                                                         $('#cancelCropBtn').data('id', imageId); readFile(this); });
        $('#cropImageBtn').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'base64',
                format: 'jpeg',
                size: 'viewport'
            }).then(function (resp) {
                $('#'+src).attr('src', resp);
                $('#cropImagePop').modal('hide');
                doAjaxUpdate(dirphp, id_img, resp);
                //alert('chegou aqui');
                
            });
        });
// End upload preview image