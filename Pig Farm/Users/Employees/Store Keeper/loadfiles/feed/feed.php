


<div class="col-md-12" style="padding-bottom: 5px;">
	<div class="row" style="border-bottom: 2px solid #567">
		<div class="col-md-4">
				 <button class="btn btn-info" type="button"  onclick="viewFeeds()"
					style="font-weight:bold; font-size:25px; width:100%">view available feeds</button>
		</div>
		<div class="col-md-4" style="border-left: 2px solid yellow">
					<button class="btn btn-info" type="button"  onclick="getReport()"
					style="font-weight:bold; font-size:25px; width:100%">Feed report</button></center>
		</div>
		<div class="col-md-4" style="border-left: 2px solid yellow">
					<button class="btn btn-info" type="button"  onclick="addFeed()"
					style="font-weight:bold; font-size:25px; width:100%">add new tool</button></center>
		</div>
	</div>
</div>

    <div class="wrapper" style="margin-left: 25%">
    		<div class="input-fields">
                <h3 style="text-align: center; margin-top :30px;color: white;text-transform: uppercase;font-family: poppins;border-bottom: 2px solid green;">Add new feed</h3>
               	<input type="text" class="input" placeholder="Name"     id="feed_name">
    		      	<input type="text" class="input" placeholder="Quantity" id="feed_quantity">
                <textarea placeholder="Description"   id="feed_type"></textarea>
                  <!-- <br> -->
                  <hr>

                <button class="btn btn-success" type="button" name="button" onclick="addnewFeed()">Add</button>
                <br>
    		</div>
</div>
