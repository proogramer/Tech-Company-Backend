<div class="container">
  <div class="messge_style_contact" id="myDiv_contact_add" style="color: green;font-size: 17px; margin: auto; text-align: center; display:none"> <font>Data Inserted Sucessfully </font> </div>
<?php
echo validation_errors();
$attributes = array('id' => 'vendor_form');
 echo form_open_multipart('', $attributes);
   ?>
    <div class="row">
      <h4>Personal Detail</h4>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="First Name" name="first_name" id="first_name" />
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Last Name" name="last_name" id="last_name" />
      </div>
      <div class="input-group input-group-icon">
        <input type="email" placeholder="Email Adress" name="email" id="email" />
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Mobile" id="mobile" name="mobile" />
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Permanent Address" id="permanent_address" name="permanent_address" />
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Present Address" id="present_address" name="present_address" />
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Pencard Number" id="pencard" name="pencard" />
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="GST Number" id="gst" name="gst" />
      </div>
      <div class="input-group input-group-icon">
        <select name="company_type" id="company_type" style="width: 400px;">
          <option value="">SELECT COMPANY TYPE</option>
          <option value="Private Limited Company">Private Limited Company</option>
          <option value="Public Limited Company">Public Limited Company</option>
          <option value="Limited Liability Partnership (LLP)">Limited Liability Partnership (LLP)</option>
        </select>
    </div>
      <div class="input-group input-group-icon">
        <select name="technology" id="tech" style="width: 400px;">
          <option value="">Technology</option>
          <option value="PHP">PHP</option>
          <option value="ANDROID">ANDROID</option>
          <option value="IOS">IOS</option>
          <option value="JAVA">JAVA</option>
          <option value="PYTHON">PYTHON</option>
        </select>
      </div>
    <div class="row">
      <h4>Account Details</h4>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Full Name" name="full_name" id="full_name" />   
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Bank Name" name="bank_name" id="bank_name" />
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Branch Name" name="branch_name" id="branch_name" />
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Account Number" name="account_no" id="account_no" />
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="IFSC CODE" name="ifsc_code" id="ifsc_code" />
      </div>
      <label for="check">Transaction Image</label>
      <div class="input-group input-group-icon">
        <input type="file" name="userfile" id="userfile" />
      </div>
     
        <input type="submit" style="background: green" class="fa fa-cc-visa" value="Submit" id="submit" />
    
    </div>
  </div>
</form>
</div>
</body>
</html>