const students = [
    {
        "id": 101,
        "name": "Ahmed",
        "age": 20,
        "address": null,
        "skills": ["Programming", "Design", "Data Analysis"],
        "isLeader": true
    },
    {
        "id": 102,
        "name": "Omar",
        "age": 22,
        "address": "Alexandria, Egypt",
        "skills": ["Machine Learning", "Web Development", "Cybersecurity"],
        "isLeader": false
    },
    {
        "id": 103,
        "name": "Abdelrhman",
        "age": 21,
        "address": "Giza, Egypt",
        "skills": ["Graphic Design", "Marketing", "Content Writing"],
        "isLeader": true
    }
];
for(let i = 0; i < students.length; i++) {
    let obj = students[i];

    document.write(`skills Of: <strong>${obj.name}</strong> Are: ${obj.skills}<br/>`);
}

