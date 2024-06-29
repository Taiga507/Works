export const sendAjaxRequest = (action, data) => {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        const url = '/ajax';

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    try {
                        const jsonResponse = JSON.parse(xhr.responseText.trim() || '{}');
                        resolve(jsonResponse);
                    } catch (error) {
                        reject(new Error('Ошибка при обработке ответа сервера: ' + error.message));
                    }
                } else {
                    reject(new Error('Ошибка HTTP: ' + xhr.status));
                }
            }
        };

        xhr.onerror = function() {
            reject(new Error('Ошибка при выполнении AJAX-запроса'));
        };
        // Преобразуем объект с данными в JSON-строку и отправляем в качестве тела запроса
        xhr.send(JSON.stringify({ action, data }));
    });
};
