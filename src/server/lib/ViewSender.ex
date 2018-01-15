defmodule ViewSender do
  @moduledoc """
  Handles the creating of views.
  """

  def index() do
    EEx.eval_file("view/home.eex")
  end

  def login() do
    EEx.eval_file("view/login_page.eex")
  end

  def register() do
    EEx.eval_file("view/registration_page.eex")
  end

  def calendar() do
    EEx.eval_file("view/calendar.eex")
  end

  def recipeSite(name) do
    header_name = String.capitalize(name)
    insert_data = [
      name: header_name,
      img: "/res/img/#{name}.jpg",
      ingredients: ['stuff', 'stuff2'],
      instructions: ['instruct', 'instr2'],
    ]
    EEx.eval_file("view/recipe.eex", insert_data)
  end

end
