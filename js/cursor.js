const cursor = document.querySelector(".cursor");
var timeout;

document.addEventListener("mousemove", (e) => {
        let x = e.pageX;
        let y = e.pageY;

        cursor.style.top = y + "px";
        cursor.style.left = x + "px";
        cursor.style.display = "block";

        // cursor effects on mouse stopped 

        function mouseStopped(){
            cursor.style.display = "none";
        }
        timeout = setTimeout(mouseStopped, 1500);
});

// cursor efects on mouseout

document.addEventListener("mouseout", () => {
    cursor.style.display = "none";
});


