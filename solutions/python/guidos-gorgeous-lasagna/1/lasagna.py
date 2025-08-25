"""Functions used in preparing Guido's gorgeous lasagna.

Learn about Guido, the creator of the Python language:
https://en.wikipedia.org/wiki/Guido_van_Rossum

This is a module docstring, used to describe the functionality
of a module and its functions and/or classes.
"""

EXPECTED_BAKE_TIME = 40
PREPARATION_TIME = 2

def bake_time_remaining(minutes_elapsed):
    """Calculate the bake time remaining.

    :param elapsed_bake_time: int - baking time already elapsed.
    :return: int - remaining bake time (in minutes) derived from 'EXPECTED_BAKE_TIME'.

    Function that takes the actual minutes the lasagna has been in the oven as
    an argument and returns how many minutes the lasagna still needs to bake
    based on the `EXPECTED_BAKE_TIME`.
    """

    return EXPECTED_BAKE_TIME - minutes_elapsed

def preparation_time_in_minutes(number_of_layers):
    """Calculate the preparation time in minutes.

    :param number_of_layers: int - lasagna layers.

    Function that takes the number of lasagna layers as
    an argument and returns how many minutes the lasagna will take to prepare
    based on the `PREPARATION_TIME`.
    """
    return number_of_layers * PREPARATION_TIME

def elapsed_time_in_minutes(number_of_layers, elapsed_bake_time):
    """Calculate the elapsed time in minutes.

    :param number_of_layers: int - lasagna layers.
    :param elapsed_bake_time: int - baking time already elapsed.

    Function that takes the number of lasagna layers and elapsed bake time  as
    an arguments and returns how many minutes have elapsed between baking and preparation.
    """

    return preparation_time_in_minutes(number_of_layers) + elapsed_bake_time
