class RunLengthEncoding {
    static encode(text: string): string {
        let previousValue: string = "";
        let count: number = 1;
        let encoded: string = "";

        for (let index = 0; index <= text.length; index++) {
            let value = text[index];
            count += value === previousValue ? 1 : 0;

            if (previousValue === value) {
                continue;
            }

            encoded += count === 1 ? previousValue : `${count}${previousValue}`;

            count = 1;
            previousValue = value;
        }

        return encoded;
    }

    static decode(text: string): string {
        return text
            .split(/(?=)([0-9]+[a-zA-Z\s])/g)
            .map((value: string) => {
                let count: string = value.replace(/[^0-9]/g, "");
                if (!this.isNumeric(count)) {
                    return value;
                }

                return "".padEnd(
                    parseInt(count, 10),
                    value.replace(/[0-9]/g, "")
                );
            })
            .join("");
    }

    static isNumeric(value: string): boolean {
        return !isNaN(parseInt(value, 10));
    }
}

export default RunLengthEncoding;
