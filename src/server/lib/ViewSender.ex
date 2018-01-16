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
    insert_data = XML.parse(name)
    EEx.eval_file("view/recipe.eex", insert_data)
  end

end
