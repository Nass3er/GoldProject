 




 
    let toggler=document.querySelector(".firstIcon");
     
    let nav=document.querySelector("nav");
    let clos=document.querySelector(".close");
    
     
      // toggler.addEventListener("click",function() {
      //   nav.classList.toggle("open");
      // });


     toggler.onclick=function(){
       nav.classList.add("open");

      };
      
      clos.onclick=function() {
        this.parentElement.classList.remove("open");
      };
      document.onkeyup=function(e){
    //  console.log(e);
        if(e.key==="Escape"){
          nav.classList.remove("open");
        }
      };
      
    // for show
   let sh=document.querySelectorAll(".showAsTable a");
   sh.forEach((a)=>{
    a.addEventListener("click",removeActive);
   });

   function removeActive() {
     sh.forEach((a)=>{
       a.classList.remove("active");
       this.classList.add("active")
     });
   }
  

                
    