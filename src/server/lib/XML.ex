defmodule XML do
  @moduledoc """
  Functions for working with the XML database
  """

  def parse(recipeName) do

    EEx.eval_file("res/xml/recipes.xml")
    |> Exml.parse
    |> Exml.get("//title") #returns a list, ["Meatballs", "Pancakes"]

    #Replace this with real data from XML
    header_name = String.capitalize(recipeName)
    insert_data = [
      name: header_name,
      img: "/res/img/#{recipeName}.jpg",
      ingredients: ['stuff', 'stuff2'],
      instructions: ['instruct', 'instr2'],
    ]
  end

end
