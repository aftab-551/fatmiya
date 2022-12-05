 
<style>
    
    #teacher_section {
    background: url(../../uploads/teachers_topbg.jpg) repeat-x top center, url(../../uploads/topnav_bg.png) repeat-x bottom center, #0460ac;
    padding: 30px 32px 40px 32px;
    margin-bottom: 20px;
}
.sidebar_title {
    font-size: 27px;
    color: #333;
    font-weight: 600;
    margin-bottom: 20px;
    margin-top: 30px;
}
.links {
    padding-bottom: 5px;
    color: #555;
}
.form-control {
    display: block;
    width: 100%;
    height: 40px;
    padding: 6px 20px;
    font-size: 16px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #d6d6d6;
    border-radius: 30px;
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.radio label, .checkbox label {
    min-height: 20px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}
input[type=checkbox], input[type=radio] {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
}
input, button, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
label {
    min-height: 20px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}
.checkbox label {
    display: inline-block;
    vertical-align: middle;
    position: relative;
    padding-left: 10px;
    line-height: 17px;
}
.checkbox label::before {
    content: "";
    display: inline-block;
    position: absolute;
    width: 16px;
    height: 16px;
    left: 0;
    margin-left: -20px;
    border: 1px solid #cccccc;
    border-radius: 2px;
    background-color: #fff;
    -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
}

.checkbox-white label::before {
    content: "";
    display: inline-block;
    position: absolute;
    width: 16px;
    height: 16px;
    left: 0;
    margin-left: -20px;
    border: 2px solid #FFF !important;
    border-radius: 2px;
    background-color: transparent !important;
    -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
}
.readbtnwrpr2 {
    margin: 20px 0;
}

a:hover, a:focus {
    color: #63666d;
    text-decoration: underline;
}
a:active, a:hover {
    outline: 0;
}
a:hover, a:active, a:focus {
    color: #405162;
    text-decoration: none;
    transition: all 0.3s ease-out;
}

:before, :after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
Pseudo ::selection element
::selection {
    color: #FFF;
    background: #0460ac;
}
#loading-div-background {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            background: #4D4D4D;
            width: 100%;
            height: 100%;
            z-index: 1;
            color: #E27513;
            opacity: 0.4;
        }
        
        #loading-div {
            width: 300px;
            height: 200px;
            text-align: center;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -150px;
            margin-top: -100px;
        }

        .equalheightrow{display: flex; flex-wrap: wrap;}
.equalheightcol{display: flex; flex-wrap: wrap;}


.checkbox {
  padding-left: 20px; }
.checkbox label {
  display: inline-block;
  vertical-align: middle;
  position: relative;
    padding-left: 10px;
	line-height: 17px;
}
.checkbox-white label::before {
  content: "";
  display: inline-block;
  position: absolute;
  width: 16px;
  height: 16px;
  left: 0;
  margin-left: -20px;
  border: 2px solid #FFF !important;
  border-radius: 2px;
  background-color: transparent !important;
  -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
  -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
      transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
	  .checkbox-white label::after {
  display: inline-block;
  position: absolute;
  width: 16px;
  height: 16px;
  left: 0;
  top: -2px !important;
    margin-left: -20px;
    padding-left: 3px;
    padding-top: 1px;
    font-size: 10px !important;
    color: #FFF !important;}
.checkbox label::before {
  content: "";
  display: inline-block;
  position: absolute;
  width: 16px;
  height: 16px;
  left: 0;
  margin-left: -20px;
  border: 1px solid #cccccc;
  border-radius: 2px;
  background-color: #fff;
  -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
  -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
      transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
.checkbox label::after {
  display: inline-block;
  position: absolute;
  width: 16px;
  height: 16px;
  left: 0;
  top: 0;
  margin-left: -20px;
  padding-left: 3px;
  padding-top: 1px;
  font-size: 11px;
      color: #555555; }
.checkbox input[type="checkbox"],
.checkbox input[type="radio"] {
  opacity: 0;
    z-index: 1; }
.checkbox input[type="checkbox"]:focus + label::before,
.checkbox input[type="radio"]:focus + label::before {
 outline:none; }
.checkbox input[type="checkbox"]:checked + label::after,
.checkbox input[type="radio"]:checked + label::after {
  font-family: "FontAwesome";
  content: "\f00c";}
.checkbox input[type="checkbox"]:indeterminate + label::after,
.checkbox input[type="radio"]:indeterminate + label::after {
  display: block;
  content: "";
  width: 10px;
  height: 3px;
  background-color: #555555;
  border-radius: 2px;
  margin-left: -16.5px;
  margin-top: 7px;
}
.checkbox input[type="checkbox"]:disabled + label,
.checkbox input[type="radio"]:disabled + label {
      opacity: 0.65; }
.checkbox input[type="checkbox"]:disabled + label::before,
.checkbox input[type="radio"]:disabled + label::before {
  background-color: #eeeeee;
        cursor: not-allowed; }
.checkbox.checkbox-circle label::before {
    border-radius: 50%; }
.checkbox.checkbox-inline {
    margin-top: 0; }

.checkbox-primary input[type="checkbox"]:checked + label::before,
.checkbox-primary input[type="radio"]:checked + label::before {
  background-color: #337ab7;
  border-color: #337ab7; }
.checkbox-primary input[type="checkbox"]:checked + label::after,
.checkbox-primary input[type="radio"]:checked + label::after {
  color: #fff; }

.checkbox-danger input[type="checkbox"]:checked + label::before,
.checkbox-danger input[type="radio"]:checked + label::before {
  background-color: #d9534f;
  border-color: #d9534f; }
.checkbox-danger input[type="checkbox"]:checked + label::after,
.checkbox-danger input[type="radio"]:checked + label::after {
  color: #fff; }

.checkbox-info input[type="checkbox"]:checked + label::before,
.checkbox-info input[type="radio"]:checked + label::before {
  background-color: #5bc0de;
  border-color: #5bc0de; outline:none;}
.checkbox-info input[type="checkbox"]:checked + label::after,
.checkbox-info input[type="radio"]:checked + label::after {
  color: #fff; outline:none;}

.checkbox-warning input[type="checkbox"]:checked + label::before,
.checkbox-warning input[type="radio"]:checked + label::before {
  background-color: #f0ad4e;
  border-color: #f0ad4e; outline:none;}
.checkbox-warning input[type="checkbox"]:checked + label::after,
.checkbox-warning input[type="radio"]:checked + label::after {
  color: #fff; outline:none;}

.checkbox-success input[type="checkbox"]:checked + label::before,
.checkbox-success input[type="radio"]:checked + label::before {
  background-color: #5cb85c;
  border-color: #5cb85c; outline:none;}
.checkbox-success input[type="checkbox"]:checked + label::after,
.checkbox-success input[type="radio"]:checked + label::after {
  color: #fff;outline:none;}

.checkbox-primary input[type="checkbox"]:indeterminate + label::before,
.checkbox-primary input[type="radio"]:indeterminate + label::before {
  background-color: #337ab7;
  border-color: #337ab7;
  outline:none;
}

.checkbox-primary input[type="checkbox"]:indeterminate + label::after,
.checkbox-primary input[type="radio"]:indeterminate + label::after {
  background-color: #fff;
}

.checkbox-danger input[type="checkbox"]:indeterminate + label::before,
.checkbox-danger input[type="radio"]:indeterminate + label::before {
  background-color: #d9534f;
  border-color: #d9534f;
}

.checkbox-danger input[type="checkbox"]:indeterminate + label::after,
.checkbox-danger input[type="radio"]:indeterminate + label::after {
  background-color: #fff;
}

.checkbox-info input[type="checkbox"]:indeterminate + label::before,
.checkbox-info input[type="radio"]:indeterminate + label::before {
  background-color: #5bc0de;
  border-color: #5bc0de;
}

.checkbox-info input[type="checkbox"]:indeterminate + label::after,
.checkbox-info input[type="radio"]:indeterminate + label::after {
  background-color: #fff;
}

.checkbox-warning input[type="checkbox"]:indeterminate + label::before,
.checkbox-warning input[type="radio"]:indeterminate + label::before {
  background-color: #f0ad4e;
  border-color: #f0ad4e;
}

.checkbox-warning input[type="checkbox"]:indeterminate + label::after,
.checkbox-warning input[type="radio"]:indeterminate + label::after {
  background-color: #fff;
}

.checkbox-success input[type="checkbox"]:indeterminate + label::before,
.checkbox-success input[type="radio"]:indeterminate + label::before {
  background-color: #5cb85c;
  border-color: #5cb85c;
}

.checkbox-success input[type="checkbox"]:indeterminate + label::after,
.checkbox-success input[type="radio"]:indeterminate + label::after {
  background-color: #fff;
}

.radio {
  padding-left: 20px; }
.radio label {
  display: inline-block;
  vertical-align: middle;
  position: relative;
    padding-left: 10px;
	line-height: 17px;
}
.radio-white label::before {
  content: "";
  display: inline-block;
  position: absolute;
  width: 16px;
  height: 16px;
  left: 0;
  margin-left: -20px;
  border: 2px solid #FFFFFF !important;
  border-radius: 50%;
  background-color: transparent;
  -webkit-transition: border 0.15s ease-in-out;
  -o-transition: border 0.15s ease-in-out;
  transition: border 0.15s ease-in-out;
  }

.radio label::before {
  content: "";
  display: inline-block;
  position: absolute;
  width: 16px;
  height: 16px;
  left: 0;
  margin-left: -20px;
  border:1px solid #cccccc;
  border-radius: 50%;
  background-color: transparent;
  -webkit-transition: border 0.15s ease-in-out;
  -o-transition: border 0.15s ease-in-out;
  transition: border 0.15s ease-in-out;
  }
.radio label::after {
  display: inline-block;
  position: absolute;
  content: " ";
  width: 8px;
  height: 8px;
  left: 4px;
  top: 4px;
  margin-left: -20px;
  border-radius: 50%;
  background-color: #555555;
  -webkit-transform: scale(0, 0);
  -ms-transform: scale(0, 0);
  -o-transform: scale(0, 0);
  transform: scale(0, 0);
  -webkit-transition: -webkit-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
  -moz-transition: -moz-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
  -o-transition: -o-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
  transition: transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
  }

.radio input[type="radio"] {
  opacity: 0;
    z-index: 1; }
.radio input[type="radio"]:focus + label::before {
  outline: none;
  }
.radio input[type="radio"]:checked + label::after {
  -webkit-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
      transform: scale(1, 1); }
.radio input[type="radio"]:disabled + label {
      opacity: 0.65; }
.radio input[type="radio"]:disabled + label::before {
        cursor: not-allowed; }
.radio.radio-inline {
    margin-top: 0; }

.radio-primary input[type="radio"] + label::after {
  background-color: #337ab7; }
.radio-primary input[type="radio"]:checked + label::before {
  border-color: #337ab7; }
.radio-primary input[type="radio"]:checked + label::after {
  background-color: #337ab7; }

.radio-danger input[type="radio"] + label::after {
  background-color: #d9534f; }
.radio-danger input[type="radio"]:checked + label::before {
  border-color: #d9534f; }
.radio-danger input[type="radio"]:checked + label::after {
  background-color: #d9534f; }
  
.radio-white input[type="radio"] + label::after {
  background-color: #FFF; }
.radio-white input[type="radio"]:checked + label::before {
  border-color: #FFF; }
.radio-white input[type="radio"]:checked + label::after {
  background-color: #FFF; }

.radio-info input[type="radio"] + label::after {
  background-color: #5bc0de; }
.radio-info input[type="radio"]:checked + label::before {
  border-color: #5bc0de; }
.radio-info input[type="radio"]:checked + label::after {
  background-color: #5bc0de; }

.radio-warning input[type="radio"] + label::after {
  background-color: #f0ad4e; }
.radio-warning input[type="radio"]:checked + label::before {
  border-color: #f0ad4e; }
.radio-warning input[type="radio"]:checked + label::after {
  background-color: #f0ad4e; }

.radio-success input[type="radio"] + label::after {
  background-color: #5cb85c; }
.radio-success input[type="radio"]:checked + label::before {
  border-color: #5cb85c; }
.radio-success input[type="radio"]:checked + label::after {
  background-color: #5cb85c; }

input[type="checkbox"].styled:checked + label:after,
input[type="radio"].styled:checked + label:after {
  font-family: 'FontAwesome';
  content: "\f00c"; }
input[type="checkbox"] .styled:checked + label::before,
input[type="radio"] .styled:checked + label::before {
  color: #fff; outline:none;}
input[type="checkbox"] .styled:checked + label::after,
input[type="radio"] .styled:checked + label::after {
  color: #fff;  outline:none;}

</style>
<div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php if($this->session->userdata('not_allowed')): ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong> <?php echo $this->session->userdata('not_allowed'); ?>
        </div>
      <?php elseif($this->session->userdata('book_success')): ?>
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successful!</strong> <?php echo $this->session->userdata('book_success'); ?><br>
        <strong>Item number!</strong> <?php echo $this->session->userdata('item_number'); ?><br>
        <strong>Txn_id!</strong> <?php echo $this->session->userdata('txn_id'); ?><br>
        <strong>Payment amount!</strong> <?php echo $this->session->userdata('payment_amt'); ?><br>
        <strong>status!</strong> <?php echo $this->session->userdata('status'); ?>
      </div>
    <?php elseif($this->session->userdata('book_fail')): ?>
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error!</strong> <?php echo $this->session->userdata('book_fail'); ?>
    </div>
  <?php endif; ?>
</div>
</div>
    <div class="row" style="padding-top: 30px;">
  <div class="col-sm-12">
      <!--<div class="row">
          <div class="col-sm-4 col-md-4">
              <h1 class="sidebar_title">Search</h1>
    <form method="get" action="<?=base_url();?>Books/search" acceptcharset="UTF-8">
            <div class="form-group">
              <input type="text" name="q" value="<?=$this->input->get('q'); ?>"  class="form-control" style="
    border-radius: 4px;
"/>
              
            </div>
          </form>
          </div>
          
          <div class="hidden-sm col-md-4"></div>
          <div class="col-sm-4 col-md-4">
              <h1 class="sidebar_title">Categories</h1>
      <div class="links">
        <?php foreach ($sub_categories as $type): ?>
        <div class="checkbox">
          <input id="checkbox<?=$type->id_sub_categories; ?>" class="styled" name="category[]" value="type_<?=$type->id_sub_categories; ?>" type="checkbox">
          <label for="checkbox<?=$type->id_sub_categories; ?>"><?=$type->sub_cat?></label>
        </div>
      <?php endforeach; ?>


    </div>
          </div>-->
      </div>
    
<div id="loading-div-background">
  <div id="loading-div" class="ui-corner-all" >
    <img src="<?=base_url();?>assets/images/preloader.gif" class="preloader-logo" alt="preloader-logo">
    <div class="spinner"></div>
  </div>
</div>
</div>
<div class="ajax_data"></div>
</div>
</div>

  <!-- jQuery 2.1.4 -->
    <script src="<?=base_url();?>admin_assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
$(document).ready(function ()
{

  newArray = [];
  $('#loading-div-background').show();

  $("input:checked").each(function () {
    newArray.push($(this).val());
  });

  $.post("<?= base_url() ?>Books/get_filtered_books/?data=" + newArray + "", {}, function (result) {
    $(".ajax_data").html(result);
    newArray = [];
    $('#loading-div-background').hide();
    
  });
  $("input[type=checkbox]").click(function () {

    $('#loading-div-background').show();

    $("input:checked").each(function () {
      newArray.push($(this).val());
    });

    $.post("<?= base_url() ?>Books/get_filtered_books/?data=" + newArray + "", {}, function (result) {
      $(".ajax_data").html(result);
      newArray = [];
      $('#loading-div-background').hide();
      
    });

    $('html,body').animate({
      scrollTop: $("#loading-div-background").offset().top},
      '500');
  });
$(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
        });
});
</script>