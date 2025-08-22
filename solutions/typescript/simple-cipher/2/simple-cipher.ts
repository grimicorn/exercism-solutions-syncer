class SimpleCipher {
    key: string;
    letters: string = "abcdefghijklmnopqrstuvwxyz";

    constructor(key?: string) {
        key = key === undefined ? this.generateKey() : key;
        this.validateKey(key);

        this.key = key;
    }

    validateKey(key: string) {
        let emptyKey = key === "";
        let hasNumber: boolean = /\d/.test(key);
        let lowerCase = key.toLowerCase() === key;
        if (hasNumber || !lowerCase || emptyKey) {
            throw "Bad key";
        }
    }

    encode(text: string) {
        let encodedCharacters: string = "";

        for (let index: number = 0; index < text.length; index++) {
            let keyIndex: number = this.keyIndex(index);

            let encodeIndex =
                this.letters.indexOf(text[index]) +
                this.letters.indexOf(this.key[keyIndex]);

            if (encodeIndex >= this.letters.length) {
                encodeIndex -= this.letters.length;
            }

            encodedCharacters += this.letters[encodeIndex];
        }

        return encodedCharacters;
    }

    decode(cipher: string) {
        let decodedCharacters: string = "";

        for (let index: number = 0; index < cipher.length; index++) {
            let keyIndex: number = this.keyIndex(index);

            let decodeIndex =
                this.letters.indexOf(cipher[index]) -
                this.letters.indexOf(this.key[keyIndex]);

            if (decodeIndex < 0) {
                decodeIndex += this.letters.length;
            }

            decodedCharacters += this.letters[decodeIndex];
        }

        return decodedCharacters;
    }

    keyIndex(index: number) {
        if (index >= this.key.length) {
            return index % this.key.length;
        }

        return index;
    }

    generateKey() {
        let randomString: string = "";
        for (let index: number = 0; index < 100; index++) {
            let randomNumber: number = Math.floor(
                Math.random() * this.letters.length
            );
            randomString += this.letters.substring(
                randomNumber,
                randomNumber + 1
            );
        }

        return randomString;
    }
}

export default SimpleCipher;
