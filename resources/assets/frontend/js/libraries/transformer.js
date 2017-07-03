export default class Transformer {

    static fetchCollection(items) {
        return items.map((item) => this.fetch(item));
    }

    static sendCollection(items) {
        return items.map((item) => this.send(item));
    }

}