let search = document.querySelector('.search-box');

document.querySelector('#search-icon').onclick =() => {
    search.classList.toggle('active');
    //=== if the search active menu should be remove 
     menu.classList.remove('active');
}
//== headder button toggle
 let header =document.querySelector('header') ;
 window.addEventListener('scroll',()=>{
    header.classList.toggle('shadow', window.scrollY > 0);
 });
 //==== toogle menu 
   let menu= document.querySelector('.navbar');

  document.querySelector('.toggle-menu').onclick =() => {
      menu.classList.toggle('active');
      //=== if the menu active search should be remove 
      search.classList.remove('active');
  }
  //== in scroll hide search and menu 
  window.onscroll =() =>{
    menu.classList.remove('active');
    search.classList.remove('active');
  }
