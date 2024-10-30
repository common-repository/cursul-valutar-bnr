<?php
/*
Plugin Name: Cursul Valutar BNR
Plugin URI: http://cursbnr.info
Description: Afisare curs valutar BNR
Version: 2.0.3
Author: <a href="http://itsoltel.com">ITSol Telecom</a>
License: GPL2
*/
?>
<?php

function addHeaderCode() {
?>
<style type="text/css">
.CursulBNR_main{
 float:left;
 width:100%;
}
.CursulBNR_mleft{
 float:left;
 width:360px;
}
.CursulBNR_mright{
 float:left;
 width:400px;
}
.CursulBNR_line{
 float:left;
 width:100%;
}
.CursulBNR_left{
 float:left;
 width:150px;
}
.CursulBNR_right{
 float:left;
 width:150px;
}
.input{
 width:70px;
 border:1px solid #253475;
 background-color: #ffffff;
}
</style>
<?php
}

function menuCurs()
{
    $file = __file__;
    add_submenu_page('plugins.php', 'Cursul Valutar BNRC', 'Cursul Valutar BNR Configuration', 10, $file, 'generatingOptions');
}

function generatingOptions()
{
    global $write_keywords_to_db_file;
    echo "<h2>Optiuni de afisare a cursului valutar BNR</h2>";

    if($_POST['submit_default']=='Defaults'){
        $width='170';
        $background='ffffff';
        $background_title='253475';
        $color='000000';
        $color_title='ffffff';
        $font_size='12';
        $font_size_title='12';
        $latime_icon='20';
        $color_top='54c336';
        $color_bottom='d31111';
        $valute='EUR-USD';
     }else{
        $width=get_option('CursulBNR_width');
        $background=get_option('CursulBNR_background');
        $background_title=get_option('CursulBNR_background_title');
        $color=get_option('CursulBNR_color');
        $color_title=get_option('CursulBNR_color_title');
        $font_size=get_option('CursulBNR_font_size');
        $font_size_title=get_option('CursulBNR_font_size_title');
        $latime_icon=get_option('CursulBNR_latime_icon');
        $valute=get_option('CursulBNR_valute');
        $color_top=get_option('CursulBNR_color_top');
        $color_bottom=get_option('CursulBNR_color_bottom');
    }

if('POST' == $_SERVER['REQUEST_METHOD']){
    if(($_POST['submit_update']=='done') and ($_POST['submit_default']!='Defaults')){
        $width = $_POST['width'];
        $background = $_POST['background'];
        $background_title = $_POST['background_title'];
        $color = $_POST['color'];
        $color_title = $_POST['color_title'];
        $font_size = $_POST['font_size'];
        $font_size_title = $_POST['font_size_title'];
        $latime_icon = $_POST['latime_icon'];
        $color_top = $_POST['color_top'];
        $color_bottom = $_POST['color_bottom'];
        $valuta=$_POST['valuta'];
        if(empty($valuta)){
            $valute='EUR-USD';
        }else{
            $valute=implode("-",$valuta);
        }

        if($_POST['submit_preview']!='Preview'){
          update_option('CursulBNR_width',$width);
          update_option('CursulBNR_background',$background);
          update_option('CursulBNR_background_title',$background_title);
          update_option('CursulBNR_color',$color);
          update_option('CursulBNR_color_title',$color_title);
          update_option('CursulBNR_font_size',$font_size);
          update_option('CursulBNR_font_size_title',$font_size_title);
          update_option('CursulBNR_latime_icon',$latime_icon);
          update_option('CursulBNR_color_top',$color_top);
          update_option('CursulBNR_color_bottom',$color_bottom);
          update_option('CursulBNR_valute',(string)$valute);
          update_option('CursulBNR_update12',12);
       }
    }
}
?>

<form method="post" action="">
<?php

    if(empty($width)) $width = 170;
    if(empty($background)) $background='ffffff';
    if(empty($background_title)) $background_title='253475';
    if(empty($color)) $color='000000';
    if(empty($color_title)) $color_title='ffffff';
    if(empty($font_size)) $font_size=12;
    if(empty($font_size_title)) $font_size_title=12;
    if(empty($latime_icon)) $latime_icon=20;
    if(empty($valute)) $valute='EUR-USD';
    if(empty($color_top)) $color_top="54c336";
    if(empty($color_bottom)) $color_bottom="d31111";
?>

<div class="CursulBNR_main">
<div class="CursulBNR_mleft">
 <script language="JavaScript" type="text/javascript" src="http://www.cursbnr.info/js/jscolor.js""> </script>
<div class="CursulBNR_line">
 <div class="CursulBNR_left">
  <b>Latime: &nbsp;  </b>
 </div>
 <div class="CursulBNR_right">
  <input type="text" name="width" class="input" value="<?php echo $width;?>">px
 </div>
</div>

<div class="CursulBNR_line">
 <div class="CursulBNR_left">
  <b>Culoare background: &nbsp;  </b>
 </div>
 <div class="CursulBNR_right">
  <input type="text" name="background" class="color input" value="<?php echo $background;?>">
 </div>
</div>

<div class="CursulBNR_line">
 <div class="CursulBNR_left">
  <b>Culoare background titlu: &nbsp;  </b>
 </div>
 <div class="CursulBNR_right">
  <input type="text" name="background_title" class="color input" value="<?php echo $background_title;?>">
 </div>
</div>

<div class="CursulBNR_line">
 <div class="CursulBNR_left">
  <b>Culoare font: &nbsp;  </b>
 </div>
 <div class="CursulBNR_right">
  <input type="text" name="color" class="input color" value="<?php echo $color;?>">
 </div>
</div>

<div class="CursulBNR_line">
 <div class="CursulBNR_left">
  <b>Culoare font titlu: &nbsp;  </b>
 </div>
 <div class="CursulBNR_right">
  <input type="text" name="color_title" class="input color" value="<?php echo $color_title;?>">
 </div>
</div>


<div class="CursulBNR_line">
 <div class="CursulBNR_left">
  <b>Marime font: &nbsp;  </b>
 </div>
 <div class="CursulBNR_right">
  <input type="text" name="font_size" class="input" value="<?php echo $font_size;?>">px
 </div>
</div>

<div class="CursulBNR_line">
 <div class="CursulBNR_left">
  <b>Marime font titlu: &nbsp;  </b>
 </div>
 <div class="CursulBNR_right">
  <input type="text" name="font_size_title" class="input" value="<?php echo $font_size_title;?>">px
 </div>
</div>

<div class="CursulBNR_line">
 <div class="CursulBNR_left">
  <b>Latime icon: &nbsp;  </b>
 </div>
 <div class="CursulBNR_right">
  <input type="text" name="latime_icon" class="input" value="<?php echo $latime_icon;?>">px
 </div>
</div>

<div class="CursulBNR_line">
 <div class="CursulBNR_left">
  <b>Culoare font variatie +: &nbsp;  </b>
 </div>
 <div class="CursulBNR_right">
  <input type="text" name="color_top" class="input color" value="<?php echo $color_top;?>">
 </div>
</div>

<div class="CursulBNR_line">
 <div class="CursulBNR_left">
  <b>Culoare font variatie -: &nbsp;  </b>
 </div>
 <div class="CursulBNR_right">
  <input type="text" name="color_bottom" class="input color" value="<?php echo $color_bottom;?>">
 </div>
</div>


<div class="CursulBNR_line">
<h3>Preview:</h3>
</div>
<div class="CursulBNR_line">
    </p>
       <script language="JavaScript" type="text/javascript" src="http://www.cursbnr.info/curs2.php?w=<?php echo $width;?>&b=<?php echo $background;?>&tb=<?php echo $background_title;?>&c=<?php echo $color;?>&tc=<?php echo $color_title;?>&f=<?php echo $font_size;?>&tf=<?php echo $font_size_title;?>&li=<?php echo $latime_icon;?>&cs=<?php echo $color_top;?>&cj=<?php echo $color_bottom;?>&v=<?php echo $valute;?>"></script><noscript><a href="http://www.cursbnr.info" target="_blank"><strong>curs valutar</strong></a></noscript>
     </p>
<input type="submit" name="submit_preview" class="button-primary" value="Preview" />
<input type="submit" class="button-primary" value="<?php _e('Save changes') ?>" />


</div>
</div>

<div class="CursulBNR_right">
<div class="CursulBNR_line">
 Valute care vor fi afisate:
</div>

<?php
$currency_name=array(
    0=>"Euro",1=>"Dolarul american",2=>"Gramul de aur",3=>"Dirhamul Emiratelor Arabe",4=>"Dolarul australian",
    5=>"Leva bulgareasca",6=>"Realul brazilian",7=>"Dolarul canadian",8=>"Francul elvetian",9=>"Renminbi-ul chinezesc",
    10=>"Coroana ceha",11=>"Coroana daneza",12=>"Lira egipteana",13=>"Lira sterlina",14=>"100 Forinti maghiari",
    15=>"Rupia indiana",16=>"100 Yeni japonezi",17=>"100 Woni sud-coreeni",18=>"Leul moldovenesc",19=>"Peso-ul mexican",
    20=>"Coroana norvegiana",21=>"Dolarul neo-zeelandez",22=>"Zlotul polonez",23=>"Dinarul sarbesc",24=>"Rubla ruseasca",
    25=>"Coroana suedeza",26=>"Lira turceasca",27=>"Hryvna ucraineana",28=>"DST",29=>"Randul sud-african"
);
$currency_sname=array(
    0=>"EUR",1=>"USD",2=>"XAU",3=>"AED",4=>"AUD",5=>"BGN",6=>"BRL",7=>"CAD",8=>"CHF",9=>"CNY",
    10=>"CZK",11=>"DKK",12=>"EGP",13=>"GBP",14=>"HUF",15=>"INR",16=>"JPY",17=>"KRW",18=>"MDL",19=>"MXN",
    20=>"NOK",21=>"NZD",22=>"PLN",23=>"RSD",24=>"RUB",25=>"SEK",26=>"TRY",27=>"UAH",28=>"XDR",29=>"ZAR"
);

$kkk=explode("-",$valute);
for($i=0;$i<30;$i++){
?>
 <div style="float:left;width:300px;">
    <div style="float:left;width:23"><img width="20"  src="http://www.cursbnr.info/images/<?php echo $currency_sname[$i]?>.gif"></div>
    <div style="float:left;margin-left:3px;width:40px;"><?php echo $currency_sname[$i];?></div>
    <div style="float:left;margin-left:3px;width:200px;"><?php echo $currency_name[$i];?></div>
    <div style="float:left;margin-left:3px;width:20px;">
     <input type="checkbox" name="valuta[]" value="<?php echo $currency_sname[$i]?>"  <?php if(in_array($currency_sname[$i],$kkk)) echo "checked";?>>
    </div>
 </div>
<?php
}
?>
</div>
</div>

<input type="hidden" name="submit_update" value="done" />
<input type="submit" name="submit_default" class="button-primary" value="Defaults" />
<input type="button" value="Settings in use now" class="button-primary" onClick="window.location.reload()">

</form>

<?php
}

function cursSettings($links,$file){

    static $this_plugin;
    if (!$this_plugin)
           $this_plugin = plugin_basename(__file__);

    if ($file == $this_plugin) {
         $settings_link = '<a href="plugins.php?page=cursul-valutar-bnr/cursul-valutar-bnr.php">' . __('Settings') . '</a>';
    array_unshift($links, $settings_link);
                                                       }
    return $links;
}

add_filter('plugin_action_links', 'cursSettings', 10, 2);
add_action('wp_head', 'addHeaderCode');
add_action('admin_head', 'addHeaderCode');
add_action('admin_menu', 'menuCurs');
add_action( 'widgets_init', 'cursLoadWidget' );

function cursLoadWidget() {
    register_widget( 'Curs_Widget' );
}

class Curs_Widget extends WP_Widget {

    function Curs_Widget() {
        $widget_ops = array( 'classname' => 'curs', 'description' => __('Afisarea cursului valutar BNR', 'curs valutar') );

        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'curs-widget' );
        $this->WP_Widget( 'curs-widget', __('Curs valutar BNR', 'curs valutar'), $widget_ops, $control_ops );
    }


    function form( $instance ) {
        $settings_link = '<a href="plugins.php?page=cursul-valutar-bnr/cursul-valutar-bnr.php">' . __('Settings') . '</a>';
        echo $settings_link;
    }

    function widget($args, $instance){
     extract( $args );

     $update=get_option('CursulBNR_update12');
     if($update!=12){
      $width = $instance['width'];
      $background = $instance['background'];
      $background_title = $instance['background_title'];
      $color = $instance['color'];
      $color_title = $instance['color_title'];
      $font_size = $instance['font_size'];
      $font_size_title = $instance['font_size_title'];
      $latime_icon = $instance['latime_icon'];

      if(!empty($width)) update_option('CursulBNR_width',$width);
      if(!empty($background))   update_option('CursulBNR_background',$background);
      if(!empty($background_title))   update_option('CursulBNR_background_title',$background_title);
      if(!empty($color))   update_option('CursulBNR_color',$color);
      if(!empty($color_title))   update_option('CursulBNR_color_title',$color_title);
      if(!empty($font_size))   update_option('CursulBNR_font_size',$font_size);
      if(!empty($font_size_title))   update_option('CursulBNR_font_size_title',$font_size_title);
      if(!empty($latime_icon))   update_option('CursulBNR_latime_icon',$latime_icon);
      update_option('CursulBNR_update12',12);
     }
        echo $before_widget;

    $width=get_option('CursulBNR_width');
    $background=get_option('CursulBNR_background');
    $background_title=get_option('CursulBNR_background_title');
    $color=get_option('CursulBNR_color');
    $color_title=get_option('CursulBNR_color_title');
    $font_size=get_option('CursulBNR_font_size');
    $font_size_title=get_option('CursulBNR_font_size_title');
    $latime_icon=get_option('CursulBNR_latime_icon');
    $valute=get_option('CursulBNR_valute');
    $color_top=get_option('CursulBNR_color_top');
    $color_bottom=get_option('CursulBNR_color_bottom');

    if(empty($width)) $width = 170;
    if(empty($background)) $background='ffffff';
    if(empty($background_title)) $background_title='253475';
    if(empty($color)) $color='000000';
    if(empty($color_title)) $color_title='ffffff';
    if(empty($font_size)) $font_size=12;
    if(empty($font_size_title)) $font_size_title=12;
    if(empty($latime_icon)) $latime_icon=20;
    if(empty($color_top)) $color_top='54c336';
    if(empty($color_bottom)) $color_bottom='d31111';
    if(empty($valute)) $valute='EUR-USD';
?>
<script language="JavaScript" type="text/javascript" src="http://www.cursbnr.info/curs2.php?w=<?php echo $width;?>&b=<?php echo $background;?>&tb=<?php echo $background_title;?>&c=<?php echo $color;?>&tc=<?php echo $color_title;?>&f=<?php echo $font_size;?>&tf=<?php echo $font_size_title;?>&li=<?php echo $latime_icon;?>&cs=<?php echo $color_top;?>&cj=<?php echo $color_bottom;?>&v=<?php echo $valute;?>"></script><noscript><a href="http://www.cursbnr.info" target="_blank"><strong>curs valutar</strong></a></noscript>

<?php
    echo $after_widget;
    }
}
