let theme = document.querySelector("#theme");
let bk = document.getElementById("bk");
let bq = document.getElementById("bq");
let nav = document.querySelector("#nav");
let img = document.querySelector("#img");
let h1 = document.querySelector(".h1");
let allButtons = document.querySelectorAll("#btn");
let footer = document.querySelector("#footer");

if( theme )
{
    theme.addEventListener("change", function(){
        let choixTheme = theme.value;
        
        localStorage.setItem("theme", choixTheme);
        if ( choixTheme === "burgerKing" )
        {
            document.body.style.fontFamily = 'Roboto', 'sans-serif';
            nav.style.backgroundColor = "#ee1c23";
            img.src = "./public/img/logo/burger_king.png";
            h1.style.color = "#faaf18";
            allButtons.forEach(btn => {
                btn.style.backgroundColor = "#185494";
            });
            footer.style.backgroundColor = "#ee1c23";
            bk.selected = true;
            bq.selected = false;
        }
        else
        {
            document.body.style.fontFamily = 'Source Serif Pro', 'serif';
            nav.style.backgroundColor = "#8833e2";
            img.src = "./public/img/logo/burger_queen.png";
            h1.style.color = "#ff00ff";
            allButtons.forEach(btn => {
                btn.style.backgroundColor = "#ed1e79";
            });
            footer.style.backgroundColor = "#8833e2";
            bq.selected = true;
            bk.selected = false;
        }
    })
}



if( localStorage.getItem("theme") )
{
    let choixTheme = localStorage.getItem("theme");
    if ( choixTheme === "burgerKing" )
    {
        document.body.style.fontFamily = 'Roboto', 'sans-serif';
        nav.style.backgroundColor = "#ee1c23";
        img.src = "./public/img/logo/burger_king.png";
        h1.style.color = "#faaf18";
        allButtons.forEach(btn => {
            btn.style.backgroundColor = "#185494";
        });
        footer.style.backgroundColor = "#ee1c23";
        bk.selected = true;
        bq.selected = false;
    }
    else
    {
        document.body.style.fontFamily = 'Source Serif Pro', 'serif';
        nav.style.backgroundColor = "#8833e2";
        img.src = "./public/img/logo/burger_queen.png";
        h1.style.color = "#ff00ff";
        allButtons.forEach(btn => {
            btn.style.backgroundColor = "#ed1e79";
        });
        footer.style.backgroundColor = "#8833e2";
        bq.selected = true;
        bk.selected = false;
    }
}



