=begin
Write your code for the 'Two Fer' exercise in this file. Make the tests in
`two_fer_test.rb` pass.

To get started with TDD, see the `README.md` file in your
`ruby/two-fer` directory.
=end
class TwoFer
  def self.two_fer(name = nil)
    if name.nil?
      return "One for you, one for me."
    end

    "One for #{name}, one for me."
  end
end
