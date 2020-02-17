//******************테스트 버튼*********************
on_btn = document.getElementById('test_on_btn');
off_btn = document.getElementById('test_off_btn');

on_btn.addEventListener('click',function(){
  document.getElementById('target').className='test';
})
off_btn.addEventListener('click',function(){
  document.getElementById('target').className='';
})
//*************************************************
