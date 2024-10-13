/* JEMO JAVASCRIPT  JEMO JAVASCRIPT  JEMO JAVASCRIPT  JEMO JAVASCRIPT  JEMO JAVASCRIPT  JEMO JAVASCRIPT  JEMO JAVASCRIPT  */

/*  
Auteur : michel amani      
Version-beta:    0.1
Date de debut : 5 novembre 2022
Date de fin : 26 janvier 2023


SOMMAIRE DES CONTENUS

    01 - Animation JS
    02 - Verification JS
    03 - Evenements js
    04 - Responsive Fixes*****
    05. - effets sonores

*/


/* ///////////////////////////////////////////////////////////////////// 
//  01 -  ANIMATION JS
/////////////////////////////////////////////////////////////////////*/


/* ///////////////////////////////////////////////////////////////////// 
//  02-  Verification JS
/////////////////////////////////////////////////////////////////////*/


/* ///////////////////////////////////////////////////////////////////// 
//  03 -  Evenements js
/////////////////////////////////////////////////////////////////////*/
    function bullmaintenance(){
    var popup = document.getElementById("popupmainten");
    popup.classList.toggle("show");
    }
    function bullmaintenanceClose(){
        var popup = document.getElementById("popupmainten");
        popup.classList.remove("show");
        }


/* ///////////////////////////////////////////////////////////////////// 
//  04 -  Responsive Fixes
/////////////////////////////////////////////////////////////////////*/


/* ///////////////////////////////////////////////////////////////////// 
//  05 -  Effets sonores
/////////////////////////////////////////////////////////////////////*/
        const audio = new Audio("/effets sonores/Mouse-Click-00.mp3");
        const buttons = document.querySelectorAll("a");

        buttons.forEach(a  => {
        a.addEventListener("click", () => {
            audio.play();
        });
        });

