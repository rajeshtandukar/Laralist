'use strict';

var csrf_token =  $( "input[name='_token']" ).val();



angular


    .module('app', ['angularFileUpload'])


    .controller('AppController', ['$scope', 'FileUploader', function($scope, FileUploader) {
        console.log($scope);
        var uploader = $scope.uploader = new FileUploader({
            url: '/media/upload',
            queueLimit: laralist.queueLimit,
            headers : {
            'X-CSRF-TOKEN': csrf_token // X-CSRF-TOKEN is used for Ruby on Rails Tokens
            }
        });

        // FILTERS

        uploader.filters.push({
            name: 'imageFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
                return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
            }
        });

        // CALLBACKS

        /*uploader.onWhenAddingFileFailed = function(item, filter, options) {
            console.info('onWhenAddingFileFailed', item, filter, options);
        };*/
        /*uploader.onAfterAddingFile = function(fileItem) {
            console.info('onAfterAddingFile', fileItem);

        };*/
        /*uploader.onAfterAddingAll = function(addedFileItems) {
            console.info('onAfterAddingAll', addedFileItems);
        };*/
        uploader.onBeforeUploadItem = function(item) {
            //console.info('onBeforeUploadItem', item);
             item.formData = {filename: ''};
        };
        /*uploader.onProgressItem = function(fileItem, progress) {
            console.info('onProgressItem', fileItem, progress);
        };*/
        /*uploader.onProgressAll = function(progress) {
            console.info('onProgressAll', progress);
        };*/
        uploader.onSuccessItem = function(fileItem, response, status, headers) {
            //console.info('onSuccessItem', fileItem, response, status, headers);
            //fileItem.formData.push({desc: response.file});
            //console.info('onSuccessItem', response);

            fileItem.formData.filename = response.file;
        };
        /*uploader.onErrorItem = function(fileItem, response, status, headers) {
            console.info('onErrorItem', fileItem, response, status, headers);
        };*/
        /*uploader.onCancelItem = function(fileItem, response, status, headers) {
            console.info('onCancelItem', fileItem, response, status, headers);
        };*/
        /*uploader.onCompleteItem = function(fileItem, response, status, headers) {
            console.info('onCompleteItem', fileItem, response, status, headers);
        };*/
        /*uploader.onCompleteAll = function() {
            console.info('onCompleteAll');
        };*/

        //console.info('uploader', uploader);
    }])
    .controller('ImgController',function($scope,$http){
        $scope.imageitems = imageitems;

        $scope.destroyMe = function(item){
            var index = $scope.imageitems.indexOf(item);
            $scope.imageitems.splice(index, 1);
            $http({
                method: 'GET',
                url: '/media/delete/'+ item.id,
                headers: {'X-CSRF-TOKEN': csrf_token}                
            }).then(function successCallback(response) {
                // this callback will be called asynchronously
                // when the response is available
            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });        
        }
    })
   

  

