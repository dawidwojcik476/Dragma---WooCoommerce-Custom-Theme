const menuBtn = document.querySelector('.header__ham');
  const mainMenu = document.querySelector('.header');
  const mainMenuCont = document.querySelector('.header__menu');


  
  let menuOpen = false;
  
  const menu = () => {
      if (!menuOpen) {
          menuBtn.classList.add('open');
          mainMenu.classList.add('open');
          mainMenuCont.classList.add('open');
          menuOpen = true;
      } else {
          menuBtn.classList.remove('open');
          mainMenu.classList.remove('open');
          mainMenuCont.classList.remove('open');
          menuOpen = false;
      }
  }
   
  menuBtn.addEventListener('click', menu);


  const searchButton = document.querySelector('.header__cart-search-button');
  const searchForm = document.querySelector('.header__cart-search-form');
  
  let offer = false;
  
  const offerac = () => {
      if (!offer) {
        searchForm.classList.add('open');
  
          offer = true;
      } else {
        searchForm.classList.remove('open');
        
          offer = false;
      }
  }
   
  searchButton.addEventListener('click', offerac);




window.onscroll = function() {myFunction()};



const header = document.querySelector(".header");
const appWrapper = document.querySelector('.app-container')



const sticky = header.offsetTop;


function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    appWrapper.classList.add("sticky");
  } else  {
    header.classList.remove("sticky");
    appWrapper.classList.remove("sticky");
  }
}

const recipes = document.querySelector('.recipes__item');

if(recipes) {

const recipeItem = document.querySelectorAll('.recipes__item');


recipeItem.forEach((item, idx) => {  
  item.addEventListener('click', () => {   
    ToggleActive(item,idx);
  });
});
function ToggleActive(el,index) {
  el.classList.toggle('active');
  recipeItem.forEach((item,idx) => {
    if(idx !== index){
      item.classList.remove("active");
    }
  });
}

}