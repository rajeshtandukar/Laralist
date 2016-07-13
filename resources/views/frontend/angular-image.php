<div  class="image-grid" ng-controller="ImgController">
	<div ng-repeat="item in imageitems"> 
	    <div class="list-group menu-category" style="border: 1px solid #ccc;">
	        <img src="{{item.src}}" height="100" alt="{{$item.src}}" />
	        <input type="hidden" name="existimage[]" value="{{item.id}}"></input>
	        <button type="button" class="btn btn-danger btn-xs" ng-click="destroyMe(item)">
	        	<span class="glyphicon glyphicon-trash"></span> Remove
	        </button>                        
	    </div>                                                                   
	</div>
</div>	