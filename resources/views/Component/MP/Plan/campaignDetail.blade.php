 <fieldset>
        <div>
            <label class="col-4">Campaign Name</label>
            <input type="text" name="" value="{{$campaign->name}}" disabled>
        </div>
        <div>
            <label class="col-4">Period From</label>
            <input type="text" name="" value="{{$campaign->campaignDetail->period_from}}" disabled>
        </div>
        <div>
            <label class="col-4">Period To</label>
            <input type="text" name="" value="{{$campaign->campaignDetail->period_to}}" disabled>
        </div>
        <div>
            <label class="col-4">Period Buget</label>
            <input type="number" name="" value="{{$campaign->campaignDetail->campaign_period_budget}}" disabled>
        </div>
     <div>
         <label class="col-4">Standard Daily Buget</label>
         <input type="number" name="" value="{{$campaign->campaignDetail->std_daily_budget}}" disabled>
     </div>
    </fieldset>
