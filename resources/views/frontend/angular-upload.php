
    
    <div ng-controller="AppController" nv-file-drop="" uploader="uploader">
        <div ng-show="uploader.isHTML5">                    
            <input type="file" nv-file-select="" uploader="uploader" multiple nv-file-drop filters="queueLimit"/>                  
        </div>
       
        <div class="media" ng-repeat="item in uploader.queue">
          <div class="media-left">
            <div ng-show="uploader.isHTML5" ng-thumb="{ file: item._file, height: 100 }"></div>
             <input type="hidden" name="image[]" value="{{item.formData.filename}}" />
          </div>
          <div class="media-body">
                <button type="button" class="btn btn-success btn-xs" ng-click="item.upload()" ng-disabled="item.isReady || item.isUploading || item.isSuccess">
                    <span class="glyphicon glyphicon-upload"></span> Upload
                </button>
                <button type="button" class="btn btn-warning btn-xs" ng-click="item.cancel()" ng-disabled="!item.isUploading">
                    <span class="glyphicon glyphicon-ban-circle"></span> Cancel
                </button>
                <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
                    <span class="glyphicon glyphicon-trash"></span> Remove
                </button>
                <br><br>
                <div class="progress" style="margin-bottom: 0;">
                  <div class="progress-bar" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
                </div>
          </div>
        </div>
    </div>
