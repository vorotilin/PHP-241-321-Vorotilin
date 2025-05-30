document.addEventListener('DOMContentLoaded', () => {
  const resultField = document.querySelector('.result-field');

  const calcClear = document.querySelector('.calc-clear');
  const calcResult = document.querySelector('.calc-result');
  const calcClearOne = document.querySelector('.calc-clear-one');

  const calc7 = document.querySelector('.calc-7');
  const calc8 = document.querySelector('.calc-8');
  const calc9 = document.querySelector('.calc-9');
  const calc4 = document.querySelector('.calc-4');
  const calc5 = document.querySelector('.calc-5');
  const calc6 = document.querySelector('.calc-6');
  const calc1 = document.querySelector('.calc-1');
  const calc2 = document.querySelector('.calc-2');
  const calc3 = document.querySelector('.calc-3');
  const calc0 = document.querySelector('.calc-0');

  const calcOpen = document.querySelector('.calc-open');
  const calcClose = document.querySelector('.calc-close');

  const calcDiv = document.querySelector('.calc-div');
  const calcMult = document.querySelector('.calc-mult');
  const calcMinus = document.querySelector('.calc-minus');
  const calcPlus = document.querySelector('.calc-plus');

  function updateResultField(value) {
    if (resultField.textContent === '0') {
      resultField.textContent = value;
    } else {
      resultField.textContent += value;
    }
  }

  function addSymbol(symbol) {
    const lastChar = resultField.textContent.slice(-1);
    if ('+-/*'.includes(lastChar) && '+-/*'.includes(symbol)) {
      resultField.textContent = resultField.textContent.slice(0, -1) + symbol;
    } else {
      updateResultField(symbol);
    }
  }

  [calc0, calc1, calc2, calc3, calc4, calc5, calc6, calc7, calc8, calc9, calcOpen, calcClose].forEach(btn => {
    btn.addEventListener('click', () => {
      updateResultField(btn.textContent);
    });
  });

  calcPlus.addEventListener('click', () => addSymbol('+'));
  calcMinus.addEventListener('click', () => addSymbol('-'));
  calcDiv.addEventListener('click', () => addSymbol('/'));
  calcMult.addEventListener('click', () => addSymbol('*'));

  calcClear.addEventListener('click', () => {
    resultField.textContent = '0';
  });

  calcClearOne.addEventListener('click', () => {
    let currentText = resultField.textContent;
    currentText = currentText.slice(0, -1);
    resultField.textContent = currentText || '0';
  });

  calcResult.addEventListener('click', () => {
    const userInput = resultField.textContent;

    fetch('tipo-server.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'expression=' + encodeURIComponent(userInput)
    })
      .then(response => {
        if (!response.ok) throw new Error('Ошибка при запросе');
        return response.text();
      })
      .then(data => {
        try {
          const parsedData = JSON.parse(data);
          resultField.textContent = parsedData.result || '0';
        } catch (e) {
          resultField.textContent = 'Ошибка данных';
        }
      })
      .catch(error => {
        console.error('Ошибка запроса:', error);
        resultField.textContent = 'Ошибка связи';
      });
  });

  const trigaBtn = document.querySelector('.calc-server');
  if (serverBtn) {
    trigaBtn.addEventListener('click', () => {
      fetch('tipo-server.php', {
        method: 'POST'
      })
        .then(res => {
          if (!res.ok) throw new Error('Ошибка при запросе с сервера');
          return res.json();
        })
        .then(data => {
          resultField.textContent = data.result || '0';
        })
        .catch(err => {
          console.error(err);
          resultField.textContent = 'Ошибка';
        });
    });
  }
});
