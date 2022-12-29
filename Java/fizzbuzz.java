package Java;

/**
 * fizzBuzz
 */
public class fizzbuzz {
    public static void main(String[] args) {
        for (int i = 0; i <= 100; i++) {
            boolean divTres = i % 3 == 0;
            boolean divCinco = i % 5 == 0;
            if (divTres && divCinco) {
                System.out.println("fizzbuz");
            } else if (divTres) {
                System.out.println("fizz");
            } else if (divCinco) {
                System.out.println("buzz");
            } else {
                System.out.println(i);
            }
        }
    }
}
