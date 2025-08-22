=begin
Write your code for the 'Acronym' exercise in this file. Make the tests in
`acronym_test.rb` pass.

To get started with TDD, see the `README.md` file in your
`ruby/acronym` directory.
=end

class Acronym
  def self.abbreviate(message)
    message.downcase
      .gsub(/-/, " ") # Seperate hyphenated words
      .split(' ')
      .map{|word| word[0]}
      .join('')
      .upcase
      .gsub(/[^0-9A-Za-z]/, "") # Remove non-alphanumeric characters
  end
end
