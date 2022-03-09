let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let home = document.querySelector(".home-section");

    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    function menuBtnChange() {
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        }else {
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
    }
}