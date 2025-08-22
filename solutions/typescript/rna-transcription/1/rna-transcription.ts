class Transcriptor {
    toRna(dna: string) {
        let dnaToRna: any = {
            G: "C",
            C: "G",
            T: "A",
            A: "U"
        };

        return dna
            .split("")
            .map((value: string) => {
                if (!dnaToRna[value]) {
                    throw new Error("Invalid input DNA.");
                }

                return dnaToRna[value];
            })
            .join("");
    }
}

export default Transcriptor;
