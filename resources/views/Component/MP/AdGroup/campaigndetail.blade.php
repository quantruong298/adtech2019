 <fieldset>
        <div>
            <label class="col-4">Campaign Name</label>
            <input type="text" name="" value="{{$campaign->campaign_name}}" disabled>
        </div>
        <div>
            <label class="col-4">Period From</label>
            <input type="text" name="" value="{{$campaign->period_from}}" disabled>
        </div>
        <div>
            <label class="col-4">Period To</label>
            <input type="text" name="" value="{{$campaign->period_to}}" disabled>
        </div>
        <div>
            <label class="col-4">Period Buget</label>
            <input type="number" name="" value="{{$campaign->period_budget}}" disabled>
        </div>
     <div>
         <label class="col-4">Standard Daily Buget</label>
         <input type="number" name="" value="{{$campaign->standard_daily_budget}}" disabled>
     </div>
    </fieldset>
