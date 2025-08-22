class ArmstrongNumbers {
    static isArmstrongNumber(number: number): boolean {
        let toPower: number = number.toString().length;
        let total: number = number
            .toString()
            .split("")
            .reduce((accumulator: number, currentValue: string) => {
                return (
                    accumulator + Math.pow(parseInt(currentValue, 10), toPower)
                );
            }, 0);

        return total === number;
    }
}

export default ArmstrongNumbers;
