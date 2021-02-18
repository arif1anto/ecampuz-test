var current_pg = 1;
function goto_page(pg) {
a = $('#total_page').text();
perpage = $('#perpage').val();
b = Math.ceil(a/perpage);
 total_page();

 if($('.tab-pane.active').hasClass('tab1')){
  penjualan(bg);
}else if($('.tab-pane.active').hasClass('tab2')){
     penjualan2(pg);
}else if($('.tab-pane.active').hasClass('tab3')){
     kartu_stok(pg);
}else if($('.tab-pane.active').hasClass('tab4')){
  pembelian(bg);
}else if($('.tab-pane.active').hasClass('tab5')){

}else if($('.tab-pane.active').hasClass('tab6')){
     
}else if($('.tab-pane.active').hasClass('tab7')){
  keuangan(pg);
}else if($('.tab-pane.active').hasClass('tab8')){
  lain2(bg);
}else {

}

 $('#page2').val(pg);
 $('#page1').val(b);
 current_pg = pg;
}

function next() {
a = $('#total_page').text();
b = Math.ceil(a/100);
  if ($('#page2').val()==b) {

  }else{
    current_pg++;
    goto_page(current_pg);
  }    
}

function prev() {
  if ($('#page2').val()<=1) {

  }else{
    current_pg--;
    goto_page(current_pg);
  }
}