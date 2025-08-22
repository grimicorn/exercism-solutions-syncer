function isLeapYear(year: number) {
    let divisibleBy4: boolean = year % 4 !== 0;
    if (divisibleBy4) {
        return false;
    }

    let divisibleBy100: boolean = year % 100 === 0;
    let divisibleBy400: boolean = year % 400 === 0;
    if (divisibleBy100 && !divisibleBy400) {
        return false;
    }

    return true;
}

export default isLeapYear;
