function rollDice() {
  const numDice = parseInt(document.getElementById("dice-count").value);
  const diceType = parseInt(document.getElementById("dice-type").value);
  const diceContainer = document.getElementById("dice-container");
  const resultText = document.getElementById("result");

  // Pulisce i risultati precedenti
  diceContainer.innerHTML = "";
  resultText.textContent = "";

  // Controllo massimo 10 dadi
  if (numDice > 10) {
    resultText.textContent = "Puoi lanciare al massimo 10 dadi!";
    return;
  }

  let total = 0;

  for (let i = 0; i < numDice; i++) {
    const roll = Math.floor(Math.random() * diceType) + 1;
    total += roll;

    const dice = document.createElement("div");
    dice.classList.add("dice");
    dice.textContent = roll;
    diceContainer.appendChild(dice);
  }

  resultText.textContent = `Totale: ${total}`;
}
