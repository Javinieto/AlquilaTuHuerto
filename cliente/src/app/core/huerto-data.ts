export class HuertoData {
  createDb() {
    let huertos = [
      {
        id: 0,
        name: 'Huerto0',
        image:
          'https://static.eldiario.es/clip/b9673a9c-67d2-40d2-ad36-5a64f682a780_16-9-aspect-ratio_default_0.jpg',
        productos: ['Tomate', 'Lechuga', 'Cebolla', 'Patata'],
        size: 50,
        disponibilidad: 'Si',
        idUsuario: '0',
      },
      {
        id: 1,
        name: 'Huerto1',
        image:
          'https://www.anova.es/sites/default/files/2019-12/7-consejos-huerto-sano.jpg',
        productos: ['Tomate', 'Lechuga', 'Cebolla', 'Patata'],
        size: 75,
        disponibilidad: 'Si',
        idUsuario: '0',
      },
      {
        id: 2,
        name: 'Huerto2',
        image:
          'https://www.anova.es/sites/default/files/2019-12/7-consejos-huerto-sano.jpg',
        productos: ['Tomate', 'Lechuga', 'Cebolla', 'Patata', 'Rúcula'],
        size: 25,
        disponibilidad: 'Si',
        idUsuario: '0',
      },
      {
        id: 3,
        name: 'Huerto3',
        image:
          'https://static.eldiario.es/clip/b9673a9c-67d2-40d2-ad36-5a64f682a780_16-9-aspect-ratio_default_0.jpg',
        productos: ['Tomate', 'Lechuga', 'Cebolla'],
        size: 75,
        disponibilidad: 'No',
        idUsuario: '0',
      },
    ];
    return { huertos: huertos };
  }
}
