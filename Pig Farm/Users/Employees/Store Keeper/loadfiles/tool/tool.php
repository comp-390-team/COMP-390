<div class="col-md-12" style="padding-bottom: 5px;">
	<div class="row" style="border-bottom: 2px solid #567">
		<div class="col-md-4">
				 <button class="btn btn-info" type="button"  onclick="vieWTools()"
					style="font-weight:bold; font-size:25px; width:100%">view available tools</button>
		</div>
		<div class="col-md-4" style="border-left: 2px solid yellow">
					<button class="btn btn-info" type="button"  onclick="toolsInUse()"
					style="font-weight:bold; font-size:25px; width:100%">tools in use</button></center>
		</div>
		<div class="col-md-4" style="border-left: 2px solid yellow">
					<button class="btn btn-info" type="button"  onclick="addTool()"
					style="font-weight:bold; font-size:25px; width:100%">Add new tool</button></center>
		</div>
	</div>
</div>

    <div class="wrapper" style="margin-left: 25%">
    		<div class="input-fields">
                <h3 style="text-align: center; margin-top :30px;color: white;text-transform: uppercase;font-family: poppins;border-bottom: 2px solid green;">Add new tool</h3>
               	<input type="text" class="input" placeholder="Name"     id="tool_name">
    		      	<input type="text" class="input" placeholder="Quantity" id="tool_quantity">
                <textarea placeholder="Description"   id="tool_description"></textarea>
                  <!-- <br> -->
                  <hr>

                <button class="btn btn-success" type="button" name="button" onclick="addnewTool()">Add</button>
                <br>
    		</div>
</div>
