 <fieldset>
        <div>
            <label class="col-4">AdGroup Name</label>
            <input type="text" name="" value="{{$adgroup->name}}" disabled>
        </div>
        <div>
            <label class="col-4">Period From</label>
            <input type="text" name="" value="{{$adgroup->adGroupDetail->period_from}}" disabled>
        </div>
        <div>
            <label class="col-4">Period To</label>
            <input type="text" name="" value="{{$adgroup->adGroupDetail->period_to}}" disabled>
        </div>
        <div>
            <label class="col-4">Period Buget</label>
            <input type="number" name="" value="{{$adgroup->adGroupDetail->ag_period_budget}}" disabled>
        </div>
     <div>
         <label class="col-4">Standard Daily Buget</label>
         <input type="number" name="" value="{{$adgroup->adGroupDetail->std_daily_budget}}" disabled>
     </div>
    </fieldset>
