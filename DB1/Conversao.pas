unit Conversao;

interface

uses StrUtils, Dialogs ;
type
  TConversao = Class
  public
    function Converter: string; virtual; abstract;

  end;

implementation

end.
