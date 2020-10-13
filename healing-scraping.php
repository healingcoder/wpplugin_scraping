<?php
/*
Plugin Name: Healing Scraping
Plugin URI:
Description: スクレイピングツール
Version: 1.0.0
Author: HealingCode
Author URI: https://healingcoder.com/
License: 
*/

add_action( 'admin_menu', 'scraping_btn' );

function scraping_btn(){
  //add_menu_page(ページタイトル　　,メニュータイトル,メニュー表示権限 ,スラック名    ,実行関数          ,アイコンURL)
	add_menu_page( 'Scraping Button','スクレイピング','manage_options','tst_setting','add_manual_page','dashicons-align-left');
}

//実行関数
function add_manual_page() {
  require_once("phpQuery-onefile.php");

  $html = file_get_contents("https://stocks.finance.yahoo.co.jp/stocks/detail/?code=998407.O");
  $html = phpQuery::newDocument($html)->find(".stoksPrice:eq(1)")->text();
  
  echo $html;

}

?>
