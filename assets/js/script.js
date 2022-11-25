let doggle = 1;
function ShowBooks(n) {
  let grid = document.querySelector(".grid");
  for (let i = 0; i < n; i++) {
    grid.innerHTML += `<div class="first">
        <div class="cover__catalog">
            <div class="solid__catalog NoFillColor${doggle}"></div>
            <div class="solid__fill__catalog FillColor${doggle}"></div>
            <img class="cover__img__catalog" src="/assets/img/image 1.png" alt="артинку съел таракан">
        </div>
        <div class="namebook">
            <h4>Лолита</h4>
            <h4>Владимир Набоков</h4>  
        </div>
        <div class="raitbut">
            <img src="/assets/img/star-svgrepo-com.svg" alt="картинку съел таракан">   
            <p>4.3</p>
            <button class="buttonfill FillColor${doggle}" type="submit">Подробнее</button>
        </div>
    </div>`;
    doggle++;
    if (doggle > 4) {
      doggle = 1;
    }
  }
}
ShowBooks(16);

const myModal = document.getElementById("myModal");
const myInput = document.getElementById("myInput");

myModal.addEventListener("shown.bs.modal", () => {
  myInput.focus();
});