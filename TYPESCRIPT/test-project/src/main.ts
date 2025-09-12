import './style.css'



document.querySelector<HTMLDivElement>('#app')!.innerHTML = `
  <div>
    <h1>Holiwis</h1>
    <button id="btnMagia">MAGIA!</button>
  </div>
`

let btnDOM = document.getElementById('btnMagia') as HTMLButtonElement;
console.log(btnDOM);

// Hacer que se botón realice un alert que diga Chauchis

