const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
/* My Profile */
const submenu_profiles = $$("#submenu-myprofile");
const panes = $$("#panel-info");
console.log(submenu_profiles);
console.log(panes);

submenu_profiles.forEach((tab, index) => {
    const pane = panes[index];
  
    tab.onclick = function () {
       $(".tab-item.active").classList.remove("active");
       $(".tab-pane.active").classList.remove("active");
  
     
  
      this.classList.add("active");
      pane.classList.add("active");
    };
  });
  