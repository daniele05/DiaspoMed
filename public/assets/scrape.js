const puppeteer = require('puppeteer');

async function scrapeMedicaments() {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    await page.goto('https://dmp.sante.gov.ma/recherche-medicaments');

    // Récupérer les noms des médicaments
    const nomsMedicaments = await page.evaluate(() => {
        const elements = document.querySelectorAll('.medicament h2');
        const noms = [];
        elements.forEach(element => {
            noms.push(element.textContent.trim());
        });
        return noms;
    });

    await browser.close();

    return nomsMedicaments;
}

scrapeMedicaments().then(noms => {
    console.log(noms);
}).catch(error => {
    console.error('Une erreur s\'est produite:', error);
});