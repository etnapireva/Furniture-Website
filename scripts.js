const cardContainer = document.querySelector('.card-container');

const messages = [
    {
        id: 1,
        title: 'Message 1',
        dateTime: '2023-03-14 10:30:00',
        department: 'Design',
        additionalInfo: 'This is message 1.'
    },
    {
        id: 2,
        title: 'Message 2',
        dateTime: '2023-03-14 11:00:00',
        department: 'Dev',
        additionalInfo: 'This is message 2.'
    },
    {
        id: 3,
        title: 'Message 3',
        dateTime: '2023-03-14 11:30:00',
        department: 'QA',
        additionalInfo: 'This is message 3.'
    }
];

messages.forEach(message => {
    const card = document.createElement('div');
    card.classList.add('card');

    const title = document.createElement('h2');
    title.classList.add('card-title');
    title.textContent = message.title;
    card.appendChild(title);

    const dateTime = document.createElement('p');
    dateTime.classList.add('card-date-time');
    dateTime.textContent = message.dateTime;
    card.appendChild(dateTime);

    const department = document.createElement('p');
    department.classList.add('card-department');
    department.textContent = message.department;
    card.appendChild(department);

    const additionalInfo = document.createElement('p');
    additionalInfo.classList.add('card-additional-info');
    additionalInfo.textContent = message.additionalInfo;
    card.appendChild(additionalInfo);

    cardContainer.appendChild(card);
});
