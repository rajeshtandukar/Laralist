
<!--  Countries -->
<div class="well">
    <h4>Countires</h4>
    <div class="row">
        <div class="col-lg-8">
            <ul class="list-unstyled">
                @foreach($countryList as $country)
                 <li><a href="#">{{$country->name}}</a>
                </li>
                @endforeach    
                 <li><a href="{!!route('frontend.country')!!}">More..</a>
                </li>                            
            </ul>
        </div>
       
    </div>
    <!-- /.row -->
</div>
